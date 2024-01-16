<template>
    <div id="app">
        <CreateTodo v-on:create-todo="addTodo"></CreateTodo>
        <TodoList v-bind:todos="todos"></TodoList>
    </div>
</template>

<script>
import axios from 'axios';
import TodoList from './components/TodoList'
import CreateTodo from './components/CreateTodo'

export default {
    name: 'app',
    components: {
        TodoList,
        CreateTodo
    },
    data: function(){
        return {
            todos: []
        }
    },

    mounted: function() {
        var _self = this;

        axios.get('http://127.0.0.1:8000//api/todos').then(function (response){
            _self.todos = response.data;
        })
    },

    methods: {
        addTodo: function(todo) {

            console.log(todo);

            this.todos.push(todo);

            axios.post('http://127.0.0.1:8000/api/add-todo', todo).then(function (response){
                console.log(response);
            }).catch(function(error) {
                console.log(error);
            })
        }
    }
}
</script>

<style>

</style>
