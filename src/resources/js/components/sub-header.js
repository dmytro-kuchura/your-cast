import React from 'react';
import Breadcrumbs from './breadcrumbs';
import {Redirect, withRouter} from 'react-router-dom';
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
        console.log(this.state)
        if (!this.state.title && this.state.breadcrumbs.length) {
            return null;
        }

        return (
            <>
                <div id="kt_subheader" className="subheader py-2 py-lg-4 subheader-solid">
                    <div
                        className="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div className="d-flex align-items-center flex-wrap mr-1">
                            <div className="d-flex align-items-baseline mr-5">
                                <h5 className="text-dark font-weight-bold my-2 mr-5">
                                    {this.state.title}
                                </h5>
                            </div>
                            <Breadcrumbs breadcrumbs={this.state.breadcrumbs}/>
                        </div>
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
