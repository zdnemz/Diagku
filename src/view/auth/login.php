<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title><?= $title ?? "Diagku" ?></title>
</head>

<body>

    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-blue-50 to-white">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">🔐 Login </h2>

            <?php if (!empty($error)): ?>
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
                    <?= $error ?>
                </div>
                <?php $error = null; ?>
            <?php endif; ?>

            <form method="post" action="/login">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    Masuk
                </button>
            </form>

            <p class="text-sm text-center text-gray-600 mt-6">
                Belum punya akun?
                <a href="/daftar" class="text-blue-600 hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>

</body>