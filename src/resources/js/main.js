import React from 'react'
import {connect} from 'react-redux'
import Footer from './components/footer'
import Aside from './components/aside';
import Header from './components/header';

class Main extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <>
                <div className="layout-wrapper">
                    <Header/>
                    <div className="content-wrapper">
                        <Aside/>
                        <div className="content-body">
                            <div className="content">
                                <div className="page-header">
                                    <div>
                                        <h3>Basic Forms</h3>
                                        <nav aria-label="breadcrumb">
                                            <ol className="breadcrumb">
                                                <li className="breadcrumb-item">
                                                    <a href="#">Home</a>
                                                </li>
                                                <li className="breadcrumb-item">
                                                    <a href="#">Forms</a>
                                                </li>
                                                <li className="breadcrumb-item active" aria-current="page">Basic Forms
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                                {this.props.children}
                            </div>
                            <Footer/>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated
    }
};

export default connect(mapStateToProps)(Main);
