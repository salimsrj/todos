new Vue({
    el: '#app',
    data: {
        newTask: '',
        todos: [],
        editedTodo: null,
    },
    methods: {
        editTodo: function(todo) {
            this.editedTodo = todo;
        },
        addTask: function() {
            axios.post('/addtask.php', { 'new_task': this.newTask })
                .then(response => {
                    this.todos.push({ 'id': response.data, 'title': this.newTask, 'edit': false });
                    this.newTask = '';
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });

        }
    },
    mounted: function() {
        axios.get('/tasklist.php')
            .then(response => (this.todos = response.data))
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });
    }

})