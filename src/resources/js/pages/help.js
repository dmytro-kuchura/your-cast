import React from 'react';

class Help extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <main>
                <div className="container p-2 mx-auto flex flex-col">
                    <h1>This is Help page</h1>
                </div>
            </main>
        );
    }
}

export default Help;
