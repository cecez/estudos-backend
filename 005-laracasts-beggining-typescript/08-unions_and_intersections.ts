interface UserCreatedEvent {
    eventType: 'USER_CREATED',
    parameters: {
        id: string,
        name: string,
        email: string
    }
}

interface UserDeletedEvent {
    eventType: 'USER_DELETED',
    parameters: {
        id: string
    }
}

type UserEvent = UserCreatedEvent | UserDeletedEvent

const handleUserEvent = (event: UserEvent) => {
    if (event.eventType === 'USER_CREATED') {
        console.log(event.parameters.name)
    }

    if (event.eventType === 'USER_DELETED') {
        console.log(event.parameters.id)
    }
}