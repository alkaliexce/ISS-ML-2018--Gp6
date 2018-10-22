function generateModel(){
        model = tf.sequential();
        model.add(tf.layers.dense({ units: 59, inputShape: 59, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 180, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 60, activation: 'relu' }));
        model.add(tf.layers.dense({ units: 1}));
        model.compile({ optimizer: 'adam', loss: 'meanSquaredError'});
        return model
}

async function trainModel(X,Y,iterations){
tf.setBackend('cpu');
    // How many examples the model should "see" before making a parameter update.
model = generateModel();
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

async function addRow(model,X,Y,iterations){
    tf.setBackend('cpu');
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


