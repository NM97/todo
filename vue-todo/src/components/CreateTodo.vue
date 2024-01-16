<template>
    <div>
        <div>
            <button class="button success" v-on:click="openForm" v-show="!isCreating">Dodaj zadanie</button>

            <div class="todo-create" v-show="isCreating">
                <input type="text" placeholder="Określ nazwę zadania" v-model="nameText" ref="name">
                <textarea placeholder="Zdefiniuj opis" v-model="descriptionText" ref="project"></textarea>
                
                <button class="button success" v-on:click="sendForm">Utwórz</button>
                <button class="button alert" v-on:click="closeForm">Zamknij</button>
            </div>
        </div>
    </div>

</template>

<script>
    
    export default{
        name: 'CreateTodo',
        data: function(){
            return {
                isCreating: false,
                nameText: '',
                descriptionText: ''
            }
        },

        methods: {
            openForm: function() {
                this.isCreating = true;
            },
            closeForm: function() {
                this.isCreating = false;
            },

            sendForm: function() {

                var name = this.nameText;
                var description = this.descriptionText;

                this.$emit('create-todo', {
                    name,
                    description,
                    status: 0
                });

                this.isCreating = false;
            }
        }
    }

</script>

<style>
    
    .todo-create{
        margin: 20px;
        width: 500px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .todo-create textarea{
        height: 150px;
    }
</style>