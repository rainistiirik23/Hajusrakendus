const location = document.getElementById('location')
fetch('https://api.openweathermap.org/data/2.5/weather?lat=58.2&lon=22.5&appid=ea9c3b31c6370cfff8582c44b36c5980&units=metric')
    .then(response => response.json())
    .then(data => {
        location.innerText = data;
    });
