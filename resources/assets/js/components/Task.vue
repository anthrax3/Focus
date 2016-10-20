<template>
    <li :class="{ 'slds-item': 1,  'task--prioritised': task.prioritised }">
        <input type="checkbox" :id="task.id" v-model="task.completed" @click="toggleCompleted"/>
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
                    // @todo: complete
                })
            }
        }
    }
</script>

<style lang="sass">
    .task--completed {
        text-decoration: line-through;
    }

    .task--prioritised {
        background: lighten(yellow, 30%) !important;
    }
</style>
