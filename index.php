<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignmemnt for Wedevs</title>
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
            </label>
          </div>
          <input v-show="todo.edit == true" v-model="todo.title" v-on:blur="todo.edit=false; $emit('update')"
            @keyup.enter="todo.edit=false; $emit('update')">
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
        <button @click="clearCompleteList">Clear Completed</button>
      </div>
    </div>

    </div>
    
  </div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
  <script src="src/js/vue.js"></script>
  <script src="src/js/axios.min.js"></script>
  <script src="src/js/script.js"></script>
</body>
<style>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  ul.todo-list {
    list-style: none;
    padding: 0;
  }

  label.complete {
    text-decoration: line-through;
    padding-left: 18px;
  }

  .hide {
    display: none;
  }

  label.complete::before {
    content: "\2705";
    height: 10px;
    width: 10px;
    display: inline-block;
    position: relative;
    left: -15px;
    font-size: 12px;
  }

  .bottom.bar {
    display: flex;
}
.total_item {
    padding-right: 10px;
}
.clear_complete {
    padding-left: 10px;
}

</style>

</html>