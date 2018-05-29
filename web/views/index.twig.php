<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
</head>
<body>
        <header>
            <h3>WeatherApp</h3>
        </header>
        <article>
            <form method="post" action="/">
                <input type="text" name="city" value="{{ weather.city }}" placeholder="Ville..." />
                <input type="submit" />
            </form>
        </article>
        {% if weather %}
            <article>
                <ul>
                    {% for img in weather.iconId %}
                        <img src="data:image/png;base64, {{ img | loadIcon }}" />
                    {% endfor %}
                    <li>Temps : {{ weather.temp }}°C</li>
                    <li>Pression : {{ weather.pressure }} </li>
                    <li>({{ weather.lat }}, {{ weather.lon }})</li>
                </ul>
            </article>
        {% endif %}
</body>
</html>