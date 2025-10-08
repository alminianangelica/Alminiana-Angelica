<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6fa;
    }
    .btn-hover:hover {
      box-shadow: 0 0 10px rgba(255,140,0,0.7);
      transform: scale(1.03);
    }
    .nav-gradient {
      background: linear-gradient(90deg, #001F3F, #003366, #001f3f);
    }
    .table-header {
      background: linear-gradient(to right, #001F3F, #FF7A00);
    }
    .border-accent {
      border-color: #FF7A00;
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Header -->
  <nav class="nav-gradient shadow-lg border-b-4 border-orange-500">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-orange-400 text-2xl font-bold flex items-center gap-2">
        <i class="fa-solid fa-user-graduate"></i> Student Directory
      </h1>
    </div>
  </nav>

  <!-- Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-xl rounded-xl p-6 border-4 border-accent">

      <!-- Top Actions -->
      <div class="flex justify-between items-center mb-6">

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('/users')?>" class="flex justify-end">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search student..." 
            class="px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500 w-64">
          <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-r-lg shadow transition-all duration-300">
            <i class="fa fa-search"></i>
          </button>
        </form>

        <!-- Add Button -->
        <a href="<?=site_url('users/create')?>"
           class="btn-hover inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-all duration-300">
          <i class="fa-solid fa-user-plus"></i> Add New 
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border-4 border-accent">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="table-header text-white uppercase tracking-wider text-sm">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-800 text-sm">
            <?php if(!empty($users)): ?>
              <?php foreach(html_escape($users) as $user): ?>
                <tr class="hover:bg-orange-100 transition duration-200">
                  <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                  <td class="py-3 px-4"><?=($user['last_name']);?></td>
                  <td class="py-3 px-4"><?=($user['first_name']);?></td>
                  <td class="py-3 px-4"><?=($user['email']);?></td>
                  <td class="py-3 px-4 flex justify-center gap-3">
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="btn-hover bg-blue-700 hover:bg-blue-800 text-white px-3 py-1 rounded-lg shadow flex items-center gap-1">
                      <i class="fa-solid fa-pen-to-square"></i> Update
                    </a>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       class="btn-hover bg-orange-600 hover:bg-orange-700 text-white px-3 py-1 rounded-lg shadow flex items-center gap-1">
                      <i class="fa-solid fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="5" class="py-4 text-gray-500">No students found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
<div class="mt-4 flex justify-center">
  <div class="pagination flex space-x-2">
    <?php
      if (!empty($page)) {
        // Palitan ang <strong> at <a> ng custom class
        echo str_replace(
          ['<a ', '<strong>', '</strong>'],
          [
            '<a class="hp-page"',          // Normal page link
            '<span class="hp-current">',   // Current page
            '</span>'
          ],
          $page
        );
      }
    ?>
  </div>

        <a href="<?=site_url('auth/logout');?>"
           class="btn-hover bg-blue-900 hover:bg-blue-950 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2">
           <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
      </div>

    </div>
  </div>

</body>
</html>
