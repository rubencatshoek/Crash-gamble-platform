<template>
    <ul class="chat messages">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <b v-if="auth_user !== null && auth_user.role_id !== 1"
                       class="primary-font text-white cursor-pointer" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        {{ message.name }}
                    </b>

                    <b v-else class="primary-font text-white">
                        {{ message.name }}
                    </b>

                    <small v-if="new Date(message['created_at']).getDate() === new Date().getDate()"
                           class="text-white">
                        {{
                            new Date(message.created_at).toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit'
                            })
                        }}
                    </small>

                    <small v-else-if="new Date(message['created_at']).getDate() < new Date().getDate()"
                           class="text-white">
                        {{ new Date(message.created_at).toLocaleString() }}
                    </small>

                    <div v-if="auth_user !== null">
                        <div v-if="auth_user.role_id === 2 || auth_user.role_id === 3 && message.role_id === 1"
                             class="dropdown-menu">
                            <mute @muted="changeStatus"
                                  v-if="message.status_id === null || message.status_id === 1 || message.status_id === 3"
                                  :userId="message.user_id" :message="message"></mute>
                            <un-mute @unmute="changeStatus" v-else-if="message.status_id === 2"
                                     :userId="message.user_id"
                                     :message="message"></un-mute>
                            <ban @ban="changeStatus" v-if="message.status_id === null" :userId="message.user_id"
                                 :message="message"></ban>
                            <un-ban @unban="changeStatus" v-if="message.status_id === 1" :userId="message.user_id"
                                    :message="message"></un-ban>
                        </div>
                    </div>

                    <div v-else>
                        <div class="dropdown-menu">
                            <mute @muted="changeStatus"
                                  v-if="message.status_id === null || message.status_id === 1 || message.status_id === 3"
                                  :userId="message.user_id" :message="message"></mute>
                            <un-mute @unmute="changeStatus" v-else-if="message.status_id === 2"
                                     :userId="message.user_id"
                                     :message="message"></un-mute>
                            <ban @ban="changeStatus" v-if="message.status_id === null" :userId="message.user_id"
                                 :message="message"></ban>
                            <un-ban @unban="changeStatus" v-if="message.status_id === 1" :userId="message.user_id"
                                    :message="message"></un-ban>
                        </div>

                        <small v-if="new Date(message['created_at']).getDate() === new Date().getDate()"
                               class="text-white">
                            {{
                                new Date(message.created_at).toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                })
                            }}
                        </small>
                    </div>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
import Mute from "./Mute";
import UnMute from "./UnMute";
import Ban from "./Ban";
import UnBan from "./UnBan";

export default {
    components: {UnBan, UnMute, Mute, Ban},

    props: ['messages', 'auth_user'],

    methods: {
        changeStatus: function (args) {
            let obj = this;
            this.messages.forEach(function (value, index) {
                if (args[0] === value.user_id) {
                    obj.messages[index].status_id = args[1];
                }
            })
        }
    }

}
</script>
