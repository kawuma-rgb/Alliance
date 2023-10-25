<!DOCTYPE html>
<html lang="en">

<head>
    <title>International telephone input</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="../assets/js/intlTelInput.css" />
    <script src="../assets/js/intlTelInput.min.js"></script>
</head>

<body>


    <div class="container">
        <form id="login" onsubmit="process(event)">
            <p>Enter your phone number:</p>
            <input id="phone" type="tel" name="phone" />
            <input type="submit" class="btn" value="Verify" />
        </form>
       
    </div>

    <!-- ^^  form code  ^^ -->
</body>
<script>
    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=c882e7aec3e0dd', {
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: 'us',
                };
            })
            .then((resp) => callback(resp.country));
    }

    const phoneInputField = document.querySelector("#phone");
    window.intlTelInput
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: getIp, 
         preferredCountries: ["ug", "co", "us", "de"],
        utilsScript: "../assets/js/utils.js",
    });
    const info = document.querySelector(".alert-info");

    function process(event) {
        event.preventDefault();

        const phoneNumber = phoneInput.getNumber();

        info.style.display = "";
        info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    }
</script>

</html>