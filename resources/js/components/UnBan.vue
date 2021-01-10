<template>
    <a :id="userId" class="dropdown-item cursor-pointer" @click="unBanUser">Unban</a>
</template>

<script>
export default {
    name: "UnBan",

    props: ["userId", "message"],

    methods: {
        unBanUser(event) {
            if (confirm("Do you really want to unban " + this.message.name)) {
                this.message.status_id = null;
                let postData = {
                    id: event.target.id,
                    action: 'unban'
                }
                axios.post('dashboard/admin/users/' + event.target.id + '/updateStatus', postData).then(response => {
                });
                this.$emit('unban', [parseInt(event.target.id), null]);
            }
        },
    }
}
</script>

<style scoped>

</style>
