(function() {
    let country = {};
    $('#popup-button').on('click', function (){
        alert('button clicked');
    })

    axios.get('http://localhost/api/test').then(resp => {
        country = resp.data;
        console.log(country);
        $('#some-link').after(`<button id="popup-button" class="m-1 h-10 transform rounded-md bg-blue-500 px-4 py-2 text-white transition-colors duration-300 hover:bg-blue-400 focus:bg-blue-400 focus:outline-none">${country.title}</button>`);
    })

    $('body').on('click','#popup-button', function (){
        alert('country id is:'+ country.id);
    })




})();
