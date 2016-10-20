<template>
    <div class="task-list">
        <div class="task-list-header slds-grid">
            <div>
                <h1 class="task-list-title slds-text-heading--large">My Tasks</h1>
            </div>
            <div class="slds-col--bump-left">
                <div class="task-add-button slds-align--absolute-center">
                    <button class="slds-button slds-button--brand" @click="showAddTask = !showAddTask">
                        <svg aria-hidden="true" class="slds-button__icon--stateful">
                            <use xlink:href="icons/utility-sprite/svg/symbols.svg#add"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <form @submit.prevent="addTask" v-show="showAddTask">
            <div class="slds-form-element">
                <div class="slds-form-element__control">
                    <input v-model="title" id="new-task-title" class="slds-input" type="text" placeholder="Task..."/>
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
                showAddTask: false,
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

<style lang="sass">
    .task-list-header {
        padding: 5px;
    }
    .task-add-button {
        width: 100%;
        height: 100%;
    }
</style>
