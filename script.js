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
