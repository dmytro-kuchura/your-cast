import React from 'react';
import {connect} from 'react-redux';
import Navigation from './common/navigation';
import Buttons from './common/buttons';
import FirstStep from './create/step-first';
import {createShow} from '../../services/show-service';
import SecondStep from './create/step-second';

class ShowCreate extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            step: 1,
            show: {}
        };

        this.handleChangeInput = this.handleChangeInput.bind(this);
        this.formValid = this.formValid.bind(this);
        this.handleNextStep = this.handleNextStep.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                step: this.props.show.step,
                show: this.props.show
            })
        }
    }

    handleChangeInput(event) {
        event.preventDefault();

        let input = event.target.name;
        let value = event.target.value;
        let state = Object.assign({}, this.state);

        state.show[input] = value;

        this.setState(state);
    }

    handleNextStep(event) {
        event.preventDefault();

        if (!this.formValid(this.state.show, this.state.step)) {
            return;
        }

        this.props.dispatch(createShow(this.state.show))
            .catch(error => {
                console.log(error);
            })
    }

    formValid(data, step) {
        // for (const [key, value] of Object.entries(data)) {
        //     if (rules.hasOwnProperty(key)) {
        //         let valid = validate(key, value, rules[key]);
        //
        //         return valid === undefined || valid === null;
        //     }
        // }

        return true;
    }

    render() {
        return (
            <>
                <div className="container">
                    <div className="card card-custom">
                        <div className="card-body p-0">
                            <div className="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                                 data-wizard-clickable="true">
                                <Navigation step={this.state.step}/>
                                <div className="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                    <div className="col-xl-12 col-xxl-7">
                                        <form className="form" id="kt_form">
                                            {this.state.step === 1 ?
                                                <FirstStep handleChangeInput={this.handleChangeInput}
                                                           show={this.state.show}/> : null}

                                            {this.state.step === 2 ?
                                                <SecondStep handleChangeInput={this.handleChangeInput}
                                                            show={this.state.show}/> : null}

                                            <Buttons step={this.state.step}
                                                     handlePreviousStep={this.handlePreviousStep}
                                                     handleSubmit={this.handleSubmit}
                                                     handleNextStep={this.handleNextStep}
                                            />
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
        show: state.Show,
    }
};

export default connect(mapStateToProps)(ShowCreate)
