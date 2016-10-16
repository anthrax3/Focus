<template>
    <div class="task-list">
        <h1>My Tasks</h1>
        <ul class="list-group">
            <task v-for="task in tasks" :title="task.title"></task>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tasks: []
            }
        },

        mounted() {
            const resource = this.$resource('/api/tasks/{/id}');
            resource.get().then(response => response.json())
                    .then(json => {
                        this.tasks = json;
                    })
        }
    }
</script>
