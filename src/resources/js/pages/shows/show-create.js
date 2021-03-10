import React from 'react';
import {connect} from 'react-redux';

class ShowCreate extends React.Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <>
                <div className="container">
                    <div className="card card-custom">
                        <div className="card-body p-0">
                            <div className="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                                 data-wizard-clickable="true">
                                <div className="wizard-nav">
                                    <div className="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                        <div className="wizard-step" data-wizard-type="step"
                                             data-wizard-state="current">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>1.</span>Show Info</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <div className="wizard-step" data-wizard-type="step">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>2.</span>Show Artwork</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <div className="wizard-step" data-wizard-type="step">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>3.</span>Format</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <div className="wizard-step" data-wizard-type="step">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>4.</span>Other Details</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <div className="wizard-step" data-wizard-type="step">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>5.</span>Categorization</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <div className="wizard-step" data-wizard-type="step">
                                            <div className="wizard-label">
                                                <h3 className="wizard-title">
                                                    <span>6.</span>Owner Details</h3>
                                                <div className="wizard-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                    <div className="col-xl-12 col-xxl-7">
                                        <form className="form" id="kt_form">
                                            <div className="pb-5" data-wizard-type="step-content"
                                                 data-wizard-state="current">
                                                <h4 className="mb-10 font-weight-bold text-dark">Setup Your Current
                                                    Location</h4>
                                                <div className="form-group">
                                                    <label>Address Line 1</label>
                                                    <input type="text" className="form-control" name="address1"
                                                           placeholder="Address Line 1" defaultValue={'Address Line 1'}/>
                                                    <span
                                                        className="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <div className="form-group">
                                                    <label>Address Line 2</label>
                                                    <input type="text" className="form-control" name="address2"
                                                           placeholder="Address Line 2" defaultValue={'Address Line 2'}/>
                                                    <span
                                                        className="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                            </div>
                                            <div className="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div className="mr-2">
                                                    <button type="button"
                                                            className="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                                            data-wizard-type="action-prev">Previous
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                            className="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                                            data-wizard-type="action-submit">Submit
                                                    </button>
                                                    <button type="button"
                                                            className="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                                            data-wizard-type="action-next">Next
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

export default connect(mapStateToProps)(ShowCreate)
