<template>
    <li class="list-group-item">
        <input type="checkbox" :id="task.id" :checked="task.completed" @click="toggleCompleted"/>
        <label :for="task.id" :class="{ 'task--completed': task.completed }">{{ task.title }}</label>
    </li>
</template>

<script>
    export default {
        props: ['task'],
        methods: {
            toggleCompleted() {
                this.$http.put(`/api/tasks/${this.task.id}`, {
                    completed: !this.task.completed
                }).then(response => response.json()).then(json => {
                    this.task.completed = json.completed
                })
            }
        }
    }
</script>

<style>
    .task--completed {
        text-decoration: line-through;
    }
</style>
