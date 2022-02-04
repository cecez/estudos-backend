
const inalcancavel = (x: never): never => {
    throw Error(x)
};

interface UserCreatedEvent2 {
    eventType: 'USER_CREATED',
    parameters: {
        id: string,
        name: string,
        email: string
    }
}

interface UserDeletedEvent2 {
    eventType: 'USER_DELETED',
    parameters: {
        id: string
    }
}

interface UserUpdatedEvent {
    eventType: 'USER_UPDATED',
    parameters: {
        id: string,
        name: string
    }
}

type UserEvent2 = UserCreatedEvent2 | UserDeletedEvent2 | UserUpdatedEvent

const handleUserEvent2 = (event: UserEvent2) => {
    if (event.eventType === 'USER_CREATED') {
        console.log(event.parameters.name)
        return
    }

    if (event.eventType === 'USER_DELETED') {
        console.log(event.parameters.id)
        return
    }

    // se esta checagem (ou outra) for removida
    // TS vai avisar que inalcancavel está sendo chamado, o que gera erro
    // pois o mesmo não espera argumento algum (never)
    if (event.eventType === 'USER_UPDATED') {
        console.log(event.parameters.id)
        return
    }

    inalcancavel(event)
}