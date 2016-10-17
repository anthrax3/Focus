<template>
    <li class="list-group-item">
        <input type="checkbox" :id="task.id" :checked="task.completed" />
        <label :for="task.id" :class="{ 'task--completed': task.completed }">{{ task.title }}</label>
    </li>
</template>

<script>
    export default {
        props: ['task']
    }
</script>

<style>
    .task--completed {
        text-decoration: line-through;
    }
</style>
