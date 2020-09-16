new Vue({
    el: '#app',
    data: {
        newTask: '',
        todos: [],
        editedTodo: null,
        checkedId: [],
        isChecked: []
    },
    methods: {
        editTodo: function(todo) {
            this.editedTodo = todo;
        },
        addTask: function() {
            axios.post('/addtask.php', { 'new_task': this.newTask })
                .then(response => {
                    this.todos.push({ 'id': response.data, 'title': this.newTask, 'status': '0', 'edit': false });
                    this.newTask = '';

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });

        },
        check: function() {
            console.log(this.checkedId)
            axios.post('/completetask.php', { 'update_task': this.checkedId })
                .then(response => {
                    this.isChecked.push(this.checkedId)
                        // this.todos.push({ 'id': response.data, 'title': this.newTask, 'edit': false });
                        // this.newTask = '';
                })
        },
        activeList: function() {
            axios.get('/activelist.php')
                .then(response => (this.todos = response.data))
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });

        },
        completeList: function() {
            axios.get('/completelist.php')
                .then(response => (this.todos = response.data))
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });

        },
        allTask: function() {
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