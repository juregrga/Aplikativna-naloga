// product-loader.js

// 1. Pridobi ID iz URL-ja
const params = new URLSearchParams(window.location.search);
const id = parseInt(params.get("id"));

// 2. Poišči izdelek z ustreznim ID-jem
const izdelek = izdelki.find((item) => item.id === id);

// 3. Prikaži izdelek, če obstaja
const container = document.getElementById("product-container");

if (izdelek && container) {
  const { material, barva, teza, velikosti } = izdelek.specifikacije || {};

  container.innerHTML = `
    <div class="col-md-6 text-center">
      <img src="${izdelek.slika}" alt="${izdelek.naziv}" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
      <h2>${izdelek.naziv}</h2>
      <p class="fw-bold fs-4">Cena: ${izdelek.cena}</p>

      <label for="velikost" class="form-label">Izberi velikost:</label>
      <select id="velikost" class="form-select mb-3">
        ${velikosti.map(size => `<option value="${size}">${size}</option>`).join('')}
      </select>

      <button class="btn btn-dark mb-3">Dodaj v košarico</button>

      <hr />
      <h5>Opis izdelka</h5>
      <p>${izdelek.opis}</p>

      <h5>Specifikacije</h5>
      <ul>
        <li>Material: ${material || '—'}</li>
        <li>Barva: ${barva || '—'}</li>
        <li>Teža: ${teza || '—'}</li>
        <li>Velikosti: ${velikosti.join(', ')}</li>
      </ul>

      <a href="trgovina.html" class="btn btn-outline-secondary mt-3">Nazaj na trgovino</a>
    </div>
  `;
} else {
  container.innerHTML = `<p class="text-danger">Izdelek ni bil najden.</p>`;
}