<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignmemnt for Wedevs</title>
  <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
  <div class="container">

    <h1>Todos</h1>

    <div id="app">

      <input type="text" name="new-task" id="new-task" v-model="newTask" v-on:keyup.enter="addTask">
      <!-- <button @click="addTask">add</button> -->

      <ul class="todo-list">
        <li v-for="(todo, index) in todos">
          <div v-show="todo.edit == false">
            <input v-if="todo.status == 0" type="checkbox" :value="todo.id" :id="todo.id" v-model="checkedId"
              @change="check($event)" v-bind:class="[ {hide:checkedId.includes(todo.id) }]">
            <label @dblclick="todo.edit = true"
              v-bind:class="[{ complete: todo.status == 1}, {complete:checkedId.includes(todo.id) }]"> {{todo.title}}
            </label><span class="delete_btn" @click="deleteItem(todo.id, index)">X</sapn>
          </div>
          <input v-show="todo.edit == true" v-model="todo.title" v-on:blur="todo.edit=false; $emit('update'); update_title(todo.id, todo.title)"
            @keyup.enter="todo.edit=false; $emit('update'); update_title(todo.id, todo.title)">
            
        </li>
      </ul>


      <div class="bottom bar">
      <div class="total_item">
      {{leftItems}} items Left
      </div>
      <div class="buttons">
        <button @click="allTask">All</button>
        <button @click="activeList">Active</button>
        <button @click="completeList">Completed</button>
      </div>
      <div class="clear_complete">
        <button v-if="checkComplete()" @click="clearCompleteList">Clear Completed</button>
      </div>
    </div>

    </div>
    
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
  <script src="src/js/vue.js"></script>
  <script src="src/js/axios.min.js"></script>
  <script src="src/js/script.js"></script>
</body>
</html>