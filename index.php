<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

    <h1>Todos</h1>

<div id="app">

<input type="text" name="new-task" id="new-task" v-model="newTask"  v-on:keyup.enter="addTask">
<!-- <button @click="addTask">add</button> -->

<ul class="todo-list">
  <li v-for = "todo in todos">
    <div v-show = "todo.edit == false">
      <input v-if="todo.status == 0" type="checkbox" :value="todo.id" :id="todo.id" v-model="checkedId" @change="check($event)">
      <label @dblclick = "todo.edit = true" v-bind:class="[{ complete: todo.status == 1}, {complete:checkedId.includes(todo.id) }]"> {{todo.title}} </label>
    </div>
    <input v-show = "todo.edit == true" v-model = "todo.title"
    v-on:blur= "todo.edit=false; $emit('update')"
    @keyup.enter = "todo.edit=false; $emit('update')">
  </li>
</ul>


</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
    <script src="src/js/vue.js"></script>
    <script src="src/js/axios.min.js"></script>
    <script src="src/js/script.js"></script>
</body>
<style>
.container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
}
ul.todo-list {
    list-style: none;
    padding: 0;
}
label.complete {
    text-decoration: line-through;
}
</style>
</html>