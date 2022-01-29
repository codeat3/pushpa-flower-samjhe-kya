<!doctype html>
<html>

<head>
    <title>Pushpa "Flower Samjhe Kya" Memes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script async src="https://cdn.splitbee.io/sb.js"></script>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="mt-10">
            <div class="text-gray-800 text-center py-4">
                <a href="/random" class="h-6 w-6">
                    Load Random Meme
                </a>
            </div>
            @foreach ($dialogues as $dialogue)
                <img class="object-cover w-full rounded-lg" src="{{ $dialogue->link }}" alt="meme">
            @endforeach
            <div class="my-3">
                {{ $dialogues->links() }}
            </div>

            <div class="text-gray-800 text-center py-4">
                Add more dialogues at <a href="https://github.com/codeat3/pushpa-flower-samjhe-kya-collections/"
                    class="hover:underline font-semibold">GIT Repo</a>
            </div>
        </div>
    </div>
</body>

</html>
