<template>
    <div class="task-list">
        <h1>My Tasks</h1>
        <form @submit.prevent="addTask">
            <div class="form-group">
                <input type="text" v-model="newTask" class="form-control" id="add-task" placeholder="Task...">
            </div>
        </form>
        <ul class="list-group">
            <task v-for="task in tasks" :task="task"></task>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: [],
                newTask: ''
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
                    title: this.newTask
                })
                        .then(response => response.json())
                        .then(json => {
                            this.tasks.unshift(json);
                            this.newTask = '';
                        })
            }
        }
    }
</script>
