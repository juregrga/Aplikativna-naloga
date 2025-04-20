document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("kontaktForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // prepreči pošiljanje

        // Polja
        const ime = document.getElementById("ime").value.trim();
        const email = document.getElementById("email").value.trim();
        const sporocilo = document.getElementById("sporocilo").value.trim();

        // Napake
        let napaka = false;

        // Reset napak
        document.getElementById("imeNapaka").textContent = "";
        document.getElementById("emailNapaka").textContent = "";
        document.getElementById("sporociloNapaka").textContent = "";

        // Preverjanje imena
        if (ime === "") {
            document.getElementById("imeNapaka").textContent = "Prosim vnesite ime.";
            napaka = true;
        }

        // Preverjanje emaila
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            document.getElementById("emailNapaka").textContent = "Vnesite veljaven e-mail naslov.";
            napaka = true;
        }

        // Preverjanje sporočila
        if (sporocilo === "") {
            document.getElementById("sporociloNapaka").textContent = "Vnesite sporočilo.";
            napaka = true;
        }

        // Če ni napak
        if (!napaka) {
            alert("Sporočilo je bilo uspešno poslano (simulacija)!");
            form.reset();
        }
    });
});
    // ==========================
    // Prikaz vsebine košarice
    // ==========================
    const kosaricaVsebina = document.getElementById("kosarica-vsebina");
    const kosaricaSkupaj = document.getElementById("kosarica-skupaj");

    const izdelki = JSON.parse(localStorage.getItem("kosarica")) || [];

    if (izdelki.length === 0) {
        kosaricaVsebina.innerHTML = "<p>Vaša košarica je prazna.</p>";
        kosaricaSkupaj.textContent = "";
        return;
    }

    let skupaj = 0;

    const tabela = document.createElement("table");
    tabela.className = "table table-striped";
    tabela.innerHTML = `
      <thead>
        <tr>
          <th>Izdelek</th>
          <th>Cena (€)</th>
        </tr>
      </thead>
      <tbody>
        ${izdelki.map(izdelek => {
          skupaj += parseFloat(izdelek.cena);
          return `<tr>
            <td>${izdelek.naziv}</td>
            <td>${izdelek.cena}</td>
          </tr>`;
        }).join("")}
      </tbody>
    `;

    kosaricaVsebina.appendChild(tabela);
    kosaricaSkupaj.textContent = `Skupaj: ${skupaj.toFixed(2)} €`;
});
