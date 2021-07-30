import React from 'react';

class Help extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <>
                <div className="row no-gutters app-block">
                    <div className="col-md-12 app-content">
                        <h1>This is Help page</h1>
                    </div>
                </div>
            </>
        );
    }
}

export default Help;
