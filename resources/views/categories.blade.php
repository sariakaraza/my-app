<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
</head>
<body>
    <h1>Liste des catégories</h1>

    <ul>
        @foreach($categories as $category)
        <li>
            <strong>{{ $category->name }}</strong> ({{ $category->slug }})
            <br/>
            {{ $category->description }}
        </li>
        @endforeach
    </ul>
</body>
</html>