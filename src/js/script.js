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

            // axios[requestType](url, this.data())
            //     .then(response => {
            //         this.onSuccess(response.data);

            //         resolve(response.data);
            //     })
            //     .catch(error => {
            //         this.onFail(error.response.data.errors);

            //         //reject(error.response.data.errors);
            //     });


            axios.post('/addtask.php', this.newTask)
                .then(function(response) {
                    // handle success
                    console.log(response);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });

            this.todos.push({ 'title': this.newTask, 'edit': false });
            this.newTask = '';



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