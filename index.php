<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos</h1>

<div id="app">

<input type="text" name="new-task" id="new-task" v-model="newTask"  v-on:keyup.enter="addTask">
<!-- <button @click="addTask">add</button> -->

<ul class="todo-list">
  <li v-for = "todo in todos">
    <div v-show = "todo.edit == false">
      <label @dblclick = "todo.edit = true"> {{todo.title}} </label>
    </div>
    <input v-show = "todo.edit == true" v-model = "todo.title"
    v-on:blur= "todo.edit=false; $emit('update')"
    @keyup.enter = "todo.edit=false; $emit('update')">
  </li>
</ul>


</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
    <script src="src/js/vue.js"></script>
    <script src="src/js/axios.min.js"></script>
    <script src="src/js/script.js"></script>
</body>
</html>