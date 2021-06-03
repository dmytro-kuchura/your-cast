import React from 'react';
import {validate} from '../../../helpers/validation';

const rules = {
    'title': ['required'],
    'description': ['string', 'nullable'],
};

class StepFirst extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            show: {}
        };

        this.state.show = props.show;
    }

    componentDidUpdate(prevProps) {
        if (prevProps.show !== this.props.show) {
            this.setState({show: this.props.show})
        }
    }

    render() {
        let show = this.state.show;

        return (
            <>
                <h4 className="create-form-title">Setup Your Show Info</h4>
                <div className="form-group">
                    <label>Title</label>
                    <input type="text"
                           className={validate('title', show.title, rules['title']) ? 'form-control is-invalid' : 'form-control'}
                           name="title"
                           placeholder="Title"
                           onChange={this.props.handleChangeInput}
                           defaultValue={show.title ? show.title : ''}/>
                    <span className="form-text text-danger">
                            {validate('title', show.title, rules['title'])}
                        </span>
                </div>
                <div className="form-group">
                    <label>Description</label>
                    <textarea rows="3"
                              className={validate('description', show.description, rules['description']) ? 'form-control is-invalid' : 'form-control'}
                              placeholder="Description"
                              name="description"
                              onChange={this.props.handleChangeInput}
                              value={show.description ? show.description : ''}/>
                    <span className="form-text text-danger">
                            {validate('description', show.description, rules['description'])}
                        </span>
                </div>
            </>
        );
    }
}

export default StepFirst;
