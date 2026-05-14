<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form method="POST" action="/profile/edit" enctype="multipart/form-data">

                <div class="flex items-center gap-6 mb-6">
                    <div class="relative w-20 h-20 cursor-pointer rounded-full group" onclick="document.getElementById('avatar-input').click()">

                        <img id="avatar-preview"
                             src="<?= $_SESSION['user']['avatar'] ?? '/images/default.png' ?>"
                             class="h-20 w-20 rounded-full object-cover" alt="">

                        <div class="absolute inset-0 rounded-full bg-black bg-opacity-0 group-hover:bg-opacity-40 transition flex items-center justify-center">
                            <span class="text-white text-xs opacity-0 group-hover:opacity-100 transition">Change</span>
                        </div>

                        <input id="avatar-input"
                               type="file"
                               name="avatar"
                               accept="image/*"
                               class="hidden">

                    </div>

                        <h2 class="text-xl font-semibold"><?= htmlspecialchars($_SESSION['user']['email']) ?></h2>
                </div>

                <hr class="mb-6">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text"
                               name="name"
                               value="<?= htmlspecialchars($_SESSION['user']['name'] ?? '') ?>"
                               class="w-full rounded-md border border-gray-300 py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <?php if  (isset($errors['body'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email"
                               name="email"
                               value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>"
                               class="w-full rounded-md border border-gray-300 py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <button type="submit"
                            class="rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Save
                    </button>
                </form>

            </div>
        </div>
    </main>

<script src="/js/profile.js"></script>
<?php require base_path('views/partials/footer.php') ?>