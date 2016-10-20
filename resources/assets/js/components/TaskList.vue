<template>
    <div class="task-list">
        <h1 class="slds-text-heading--large">My Tasks</h1>
        <form @submit.prevent="addTask">
            <div class="slds-form-element">
                <div class="slds-form-element__control">
                    <input v-model="title" id="new-task-title" class="slds-input" type="text" placeholder="Task..." />
                </div>
            </div>
            <div class="slds-form-element">
                <button type="button" class="slds-button slds-button--brand">Add</button>
            </div>
        </form>
        <ul class="slds-has-dividers--top-space">
            <task v-for="task in tasks" :task="task"></task>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                title: '',
                dueDate: '',
                dueTime: ''
            }
        },

        components: {
            task: require('./Task.vue')
        },

        created() {
            this.fetchTasks();
        },

        methods: {
            api() {
                return this.$resource('/api/tasks/{/id}')
            },
            fetchTasks() {
                this.api().get()
                        .then(response => response.json())
                        .then(json => {
                            this.tasks = json;
                        })
            },
            addTask() {
                this.api().save({
                    title: this.title,
//                    dueDate: this.dueDate + 'T' + this.dueTime
                })
                        .then(response => response.json())
                        .then(json => {
                            this.tasks.unshift(json);
                            this.title = '';
//                            this.dueDate = '';
//                            this.dueTime = '';
                        })
            }
        }
    }
</script>
