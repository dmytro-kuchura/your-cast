import React from 'react';
import {connect} from 'react-redux';

class ShowDashboard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {
                id: null,
                title: '',
                description: '',
                artwork: null,
                format: 'episodic',
                timezone: 'Etc/GMT',
                language: 'en',
                explicit: false,
                category: null,
                tags: null,
                author: null,
                podcast_owner: null,
                email_owner: null,
                copyright: null,
            }
        };
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                show: this.props.show
            })
        }
    }

    componentWillUnmount() {
        this.setState({
            show: {}
        })
    }

    render() {
        return (
            <>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
        show: state.Show,
    }
};

export default connect(mapStateToProps)(ShowDashboard)
