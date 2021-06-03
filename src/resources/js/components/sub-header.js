import React from 'react';
import Breadcrumbs from './breadcrumbs';
import {withRouter} from 'react-router-dom';
import {getBreadcrumbs} from '../helpers/getBreadcrumbs';
import {getTitles} from '../helpers/getTitles';
import {connect} from 'react-redux';

class SubHeader extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            auth: null,
            title: null,
            breadcrumbs: []
        };

        this.detectBreadcrumbsAndTitle = this.detectBreadcrumbsAndTitle.bind(this);
    }

    componentDidMount() {
        if (this.props.hasOwnProperty('location')) {
            this.detectBreadcrumbsAndTitle(this.props.location)
        }
    }

    componentDidUpdate(prevProps) {
        if (prevProps.auth !== this.props.auth) {
            this.setState({auth: this.props.auth})
        }
    }

    detectBreadcrumbsAndTitle(props) {
        let title = getTitles(props);
        let breadcrumbs = getBreadcrumbs(props);

        this.setState({
            title,
            breadcrumbs
        })
    }

    render() {
        if (!this.state.title && this.state.breadcrumbs.length) {
            return null;
        }

        return (
            <>
                <div className="page-header">
                    <div>
                        <h3>{this.state.title}</h3>
                        <Breadcrumbs breadcrumbs={this.state.breadcrumbs}/>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        auth: state.Auth,
    }
};

export default connect(mapStateToProps)(withRouter(SubHeader));
