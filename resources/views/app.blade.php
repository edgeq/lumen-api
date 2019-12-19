<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  <title>Lumen Api</title>
</head>

<body class="bg-blue-900">

  <div class="container mx-auto h-screen bg-blue-900 flex flex-col items-center content-center justify-center">
    <div class="md:flex mx-auto items-center">
      <div class="bg-gray-100 flex justify-between p-6 rounded-lg border">
        <img id="avatar" src="https://picsum.photos/200" alt="avatar" class="rounded-full p-2" />
        <div class="flex flex-col items-center justify-right">
          <h4 class="font-bold" id="name">Name goes here</h4>
          <div id="email">
            email@email.com
          </div>
          <div id="birthday">birthday goes here</div>
        </div>
      </div>

    </div>
    <button id="loadContact"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-4 py-2 px-4 rounded-full focus:outline-none">New
      Card</button>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

  <script>
  const name = document.getElementById("name");
  const email = document.getElementById("email");
  const birthday = document.getElementById("birthday");
  const avatar = document.getElementById("avatar");
  const button = document.getElementById("loadContact")

  button.addEventListener('click', getData);

  function getData() {
    axios.get('/fetch-data')
      .then((response) => {
        const userInfo = response.data;
        name.innerText = userInfo.name;
        email.innerText = userInfo.email;
        birthday.innerText = userInfo.birthday;
        avatar.src = userInfo.photo;
        console.log(userInfo);
        return;
      });
  }

  getData();
  </script>
</body>

</html>