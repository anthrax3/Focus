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
                this.task.completed = !this.task.completed;
            }
        }
    }
</script>

<style>
    .task--completed {
        text-decoration: line-through;
    }
</style>
