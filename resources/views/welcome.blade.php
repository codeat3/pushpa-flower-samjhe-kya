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
    <div class="relative flex items-top justify-center min-h-screen text-gray-800 bg-gray-100 ">
        <div class="mt-5">
            <h1 class="text-3xl text-center font-bold my-2">
                Pushpa "Flower Samjhe Kya" Meme Collections
            </h1>

            <h3 class="text-2xl text-center font-semibold italic my-3">
                {{ $dialogue->dialogue }}
            </h3>

            <x-meme-pagination :dialogue="$dialogue" />
            <img class="object-cover border w-full rounded-lg shadow-xl" src="{{ $dialogue->image_link }}" alt="meme">
            <x-meme-pagination :dialogue="$dialogue" />

            <div class="text-gray-800 text-center py-4">
                Add more dialogues at <a href="https://github.com/codeat3/pushpa-flower-samjhe-kya-collections/"
                    class="hover:underline font-semibold">GIT Repo</a>
            </div>

        </div>
    </div>
</body>

</html>
