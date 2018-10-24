function generateModel(){
        model = tf.sequential();
        model.add(tf.layers.dense({ units: 59, inputShape: 59, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 180, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 100, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 60, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 1}));
        model.compile({ optimizer: 'adam', loss: 'meanSquaredError'});
        return model
}

async function trainModel(X,Y,iterations){
    alert('Training data... Please do not close window...');
tf.setBackend('cpu');
    // How many examples the model should "see" before making a parameter update.
model = generateModel();
Xs=tf.tensor(X);
Ys = tf.tensor(Y);
console.log(Xs.print(true));
console.log(Ys.print(true));

for (var i =0;i<iterations;i++){
    const h = await model.fit(x=Xs,y=Ys,{batchsize:32, epochs:1,verbose:2});
    console.log(h.history.loss[0]);
    }
    alert("Saving Data to server... Please do not close window...");
    await model.save("http://localhost:83/updateModel.php");
    
        alert('Trained model saved!');
        window.location.href = "admin.php";
}

async function addRow(model,X,Y,iterations){
    tf.setBackend('webgl');
Xs=tf.tensor(X);
Ys = tf.tensor(Y);
console.log(Xs.print(true));
console.log(Ys.print(true));

for (var i =0;i<iterations;i++){
    const h = await model.fit(x=Xs,y=Ys,verbose=2);
    console.log(h.history.loss[0]);
    }
    await model.save("http://localhost:83/updateModel.php");
}


async function predict(inputArray){
    const model = await tf.loadModel('/model/model.json');
    //const model = await tf.loadFrozenModel('/model/model.json','/model/model.weights.bin');
    inputTensor=tf.tensor([inputArray]);
    predictedTensor=model.predict(inputTensor);
    return Array.from(predictedTensor.dataSync());
    //alert(model.getWeights());
}