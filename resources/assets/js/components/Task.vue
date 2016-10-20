<template>
    <li :class="{ 'slds-item': 1,  'task--prioritised': task.prioritised }">
        <span class="slds-checkbox">
            <input type="checkbox" :id="task.id" v-model="task.completed" @click="toggleCompleted"/>
            <label class="slds-checkbox__label" :for="task.id">
                <span class="slds-checkbox--faux"></span>
                <span :class="{ 'slds-form-element__label': 1, 'task--completed': task.completed }">{{ task.title }}</span>
            </label>
        </span>
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
                    this.task.completed = json.completed;
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
