// import intlTelInput from 'intl-tel-input';

const phoneInputField = document.querySelector('#phone');
const phoneInput = window.intlTelInput(phoneInputField, {
  initialCountry: 'auto',
  geoIpLookup: getIp,
  preferredCountries: ['ru', 'cn', 'id', 'ir'],
  utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js',
});

const info = document.querySelector('.alert-info');

function process(event) {
  event.preventDefault();

  const phoneNumber = phoneInput.getNumber();

  info.style.display = '';
  info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
}

function getIp(callback) {
  fetch('https://ipinfo.io/json?token=2d93dc8a68046d', { headers: { Accept: 'application/json' } })
    .then((resp) => resp.json())
    .catch(() => {
      return {
        country: 'us',
      };
    })
    .then((resp) => callback(resp.country));
}
// ipinfo.io token: 2d93dc8a68046d
