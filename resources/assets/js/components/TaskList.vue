<template>
    <div class="task-list">
        <div class="task-list-header slds-grid">
            <div>
                <h1 class="task-list-title slds-text-heading--large">My Tasks</h1>
            </div>
            <div class="slds-col--bump-left">
                <div class="task-add-button slds-align--absolute-center">
                    <button class="slds-button slds-button--neutral" @click="toggleAddForm">
                        <svg aria-hidden="true" class="slds-button__icon--stateful">
                            <use xlink:href="icons/utility-sprite/svg/symbols.svg#add"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <form @submit.prevent="addTask" v-show="showAddTask" class="task-add-form">
            <div class="task-add-form__title slds-form-element">
                <div class="slds-form-element__control">
                    <input v-model="newTask.title" id="new-task-title" class="slds-input" type="text"
                           placeholder="Task..."/>
                </div>
            </div>
            <div class="slds-form-element">
                <button type="submit" class="slds-button slds-button--brand">Add</button>
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
                newTask: {
                    title: '',
                    priority: false
                }
            }
        },

        components: {
            task: require('./Task.vue')
        },

        created() {
            this.fetchTasks();
            this.getInitialAddFormState();
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
                    title: this.newTask.title,
                })
                        .then(response => response.json())
                        .then(json => {
                            this.tasks.unshift(json);
                            this.title = '';
                        })
            },
            toggleAddForm() {
                this.showAddTask = !this.showAddTask;
                localStorage.setItem('add-form-state', this.showAddTask);
            },
            getInitialAddFormState() {
                this.showAddTask = localStorage.getItem('add-form-state') || false;
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

    .task-add-form {
        display: flex;
        padding: 5px;
    }

    .task-add-form__title {
        flex-grow: 1;
        margin-right: 0.5rem;
    }
</style>
