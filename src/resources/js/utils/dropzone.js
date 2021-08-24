import React from 'react';
import {notification} from './noty';

class Dropzone extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            title: props.title ?? null,
            description: props.description ?? null,
            type: props.type ?? null,
        };

        this.handleSelectFile = this.handleSelectFile.bind(this);
        this.handleFileInput = this.handleFileInput.bind(this);
    }

    componentDidUpdate(prevProps) {
        if (prevProps !== this.props) {
            this.setState({
                content: this.props.content,
                description: this.props.description,
                type: this.props.type
            })
        }
    }

    handleFileInput() {
        document.getElementById('file').click()
    }

    handleSelectFile(event) {
        if (event.target.files[0]) {
            let file = event.target.files[0];
            if (file.type !== 'audio/mpeg' && this.state.type === 'audio') {
                notification('This is not valid audio file, only *.mp3!', 'error');
            }
            if (file.type !== 'image/jpeg' && file.type !== 'image/png' && this.state.type === 'cover') {
                notification('This is not valid image file, only *.jpeg or *.png!', 'error');
            }
        }
    }

    render() {
        if (this.state.title === null) {
            return null;
        }

        return (
            <div id="dropzone">
                <form className="dropzone needs-click dz-clickable" onClick={this.handleFileInput}>
                    <div className="dz-message needs-click">
                        <button type="button" className="dz-button">{this.state.title}</button>
                        <br/>
                        <span className="note needs-click">{this.state.description}</span>
                    </div>
                    <input id="file" hidden type="file" onChange={this.handleSelectFile}/>
                </form>
            </div>
        );
    }
}

export default Dropzone;
