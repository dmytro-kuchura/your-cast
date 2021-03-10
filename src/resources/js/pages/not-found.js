import React from 'react';

class NotFound extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="d-flex flex-column flex-root">
                <div
                    className="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30"
                    style={{backgroundImage: 'url(/media/img/error-bg.jpg)'}}>
                    <h1 className="font-weight-boldest text-dark-75 mt-15" style={{fontSize: '10rem'}}>404</h1>
                    <p className="font-size-h3 text-muted font-weight-normal">OOPS! Something went wrong here</p>
                </div>
            </div>
        );
    }
}

export default NotFound;
