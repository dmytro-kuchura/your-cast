import React from 'react';
import Breadcrumbs from './breadcrumbs';
import HeaderButtons from './header-buttons';
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
            route: null,
            breadcrumbs: []
        };

        this.detectBreadcrumbsAndTitle = this.detectBreadcrumbsAndTitle.bind(this);
        this.detectHeaderButtons = this.detectHeaderButtons.bind(this);
    }

    componentDidMount() {
        if (this.props.hasOwnProperty('location')) {
            this.detectBreadcrumbsAndTitle(this.props.location)
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

    detectHeaderButtons(props) {
        this.setState({
            route: props.pathname
        })
    }

    render() {
        if (!this.state.title && this.state.breadcrumbs.length) {
            return null;
        }

        return (
            <>
                <div className="page-header d-md-flex justify-content-between">
                    <div>
                        <h3>{this.state.title}</h3>
                        <Breadcrumbs breadcrumbs={this.state.breadcrumbs}/>
                    </div>
                    <HeaderButtons route={this.state.route}/>
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
