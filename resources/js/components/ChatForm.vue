<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-md" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
export default {
    props: ['user'],

    data() {
        return {
            newMessage: ''
        }
    },

    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                name: this.user.name,
                message: this.newMessage,
                user_id: this.user.id,
                role_id: this.user.role_id,
                status_id: this.user.status_id,
            });

            this.newMessage = '';
        },
    }
}
</script>
