import React from 'react';
import {Link} from 'react-router-dom';

class HeaderButtons extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            buttons: null,
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps.buttons !== this.props.buttons) {
            this.setState({buttons: this.props.buttons})
        }
    }

    render() {
        let buttons = this.state.buttons;

        if (!buttons) {
            return null;
        }

        return (
            <>
                <div className="mt-2 mt-md-0">
                    {buttons.createShow ? <Link to={'/account/show/create'} className="btn btn-success mr-1 ml-1">New Show</Link> : ''}
                    {buttons.createEpisode ? <Link to={'/account/episodes/create'} className="btn btn-success mr-1 ml-1">New Episode</Link> : ''}
                </div>
            </>
        );
    }
}

export default HeaderButtons;
